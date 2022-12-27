import React, { useState } from "react";
import { useCreatePost } from "../../query/PostQuery";
import styled from "styled-components";
export const PostInput = () => {
    const [content, setContent] = useState("");
    const createPost = useCreatePost();

    const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        createPost.mutate(content);
        setContent("");
    };

    return (
        <SHeader>
            <form className="input-form" onSubmit={handleSubmit}>
                <div className="inner">
                    <input
                        type="text"
                        className="input"
                        placeholder="TODOを入力してください。"
                        value={content}
                        onChange={(e) => setContent(e.target.value)}
                    />
                    <button className="btn is-primary">追加</button>
                </div>
            </form>
        </SHeader>
    );
};

const SHeader = styled.header`
    outline: 1px solid gray;
    background-color: lightcyan;
    height: 100px;
`;
