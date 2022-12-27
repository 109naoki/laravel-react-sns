import React, { useState, useEffect } from "react";
import { useParams } from "react-router-dom";

import { UserEdit } from "../user/UserEdit";
import axios from "axios";
import { Post } from "../../types/Post";
import { useAuthentication } from "../../query/AuthQuery";
import BookmarkIcon from "@mui/icons-material/Bookmark";
export const UserPage = () => {
    const { id } = useParams<{ id: string }>();
    const [user, setUser] = useState<Post>();
    const [userPost, setUserPost] = useState<Post[]>();
    const auth = useAuthentication();
    const [followFlg, unFollowFlg] = useState(true);

    useEffect(() => {
        getUser();
    }, []);

    const getUser = async () => {
        const response = await axios.get(`/api/user/${id}`);
        setUser(response.data.user);
        setUserPost(response.data.post);
    };
    const follow = async () => {
        const response = await axios.post(`/api/users/${id}/follow`);
        unFollowFlg(!followFlg);
    };
    const unfollow = async () => {
        const response = await axios.post(`/api/users/${id}/unfollow`);
        unFollowFlg(!followFlg);
    };

    const msg = () => {
        if (id == auth.data) {
            return (
                <>
                    <h1>マイページ</h1>
                    <UserEdit props={user} />
                </>
            );
        } else {
            return (
                <>
                    <h1>{user?.name}</h1>
                    {followFlg ? (
                        <BookmarkIcon
                            color="disabled"
                            onClick={() => follow()}
                        />
                    ) : (
                        <BookmarkIcon
                            color="success"
                            onClick={() => unfollow()}
                        />
                    )}
                </>
            );
        }
    };

    return (
        <div>
            {msg()}
            {userPost?.map((post) => (
                <p key={post.id}>{post.content}</p>
            ))}
        </div>
    );
};
