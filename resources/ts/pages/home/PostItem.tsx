import { Post } from "../../types/Post";
import React, { useState, useEffect } from "react";
import { toast } from "react-toastify";
import { useDeletePost, useUpdatePost } from "../../query/PostQuery";
import { Button } from "@mui/material";
import axios from "axios";
import FavoriteTwoToneIcon from "@mui/icons-material/FavoriteTwoTone";
import {
    BrowserRouter,
    Switch,
    Route,
    Link,
    RouteProps,
    Redirect,
    NavLink,
} from "react-router-dom";
import { UserPage } from "../user";
import { useAuthentication } from "../../query/AuthQuery";
type Props = {
    post: Post;
};

export const PostItem = ({ post }: Props) => {
    // const deletePost = useDeletePost();

    const [likeFlg, setLikeFlg] = useState(post.favorites_id);
    const like = async () => {
        const response = await axios.post(`/api/${post.post_id}/favorite`);
        setLikeFlg(response.data.status);
    };
    const unlike = async () => {
        const response = await axios.post(`/api/${post.post_id}/unfavorite`);
        setLikeFlg(response.data.status);
    };

    const msg = () => {
        if (likeFlg == null || likeFlg == "unlike") {
            return (
                <>
                    <FavoriteTwoToneIcon
                        color="disabled"
                        onClick={() => like()}
                    />
                </>
            );
        } else if (likeFlg != null || likeFlg == "like") {
            return (
                <>
                    <FavoriteTwoToneIcon
                        color="success"
                        onClick={() => unlike()}
                    />
                </>
            );
        }
    };

    return (
        <div>
            <Link to={`/user/${post.id}`}>{post.name}</Link>

            <p>{post.content}</p>

            {msg()}
        </div>
    );
};
