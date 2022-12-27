import { usePosts } from "../../query/PostQuery";
import React from "react";
import { PostItem } from "./PostItem";

export const PostList = () => {
    const { data: posts, status } = usePosts();

    if (status === "loading") {
        return <h1>ローディング中</h1>;
    } else if (status === "error") {
        return <h1>データの読み込みに失敗しました</h1>;
    } else if (!posts || posts.length <= 0) {
        return <h1>登録された情報はありません</h1>;
    }

    return (
        <>
            <div className="inner">
                <ul className="task-list">
                    {posts.map((post) => (
                        <PostItem key={post.post_id} post={post} />
                    ))}
                </ul>
            </div>
        </>
    );
};
