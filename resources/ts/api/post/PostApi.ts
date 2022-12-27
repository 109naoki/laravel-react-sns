import { Post } from "../../types/Post";
import axios from "axios";

const getPosts = async () => {
    const { data } = await axios.get<Post[]>("api/posts");
    return data;
};

const createPost = async (content: string) => {
    const { data } = await axios.post<Post[]>(`api/posts`, {
        content: content,
    });
    return data;
};

const updatePost = async ({ id, post }: { id: number; post: Post }) => {
    const { data } = await axios.put<Post>(`/api/posts/${id}`, post);
    return data;
};

const deletePost = async (id: number) => {
    const { data } = await axios.delete<Post>(`/api/posts/${id}`);
    return data;
};

export { getPosts, createPost, updatePost, deletePost };
