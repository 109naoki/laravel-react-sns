export type Post = {
    id: number;
    email: string;
    post: [];
    user: [];
    favorites_id: string;
    user_id: number;
    post_id: number;
    content: string;
    name: string;
    image: string | undefined;
    created_at: Date;
    updated_at: Date;
};
