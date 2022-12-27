import axios from "axios";
import { User } from "../../types/User";

const showUser = async (id: string) => {
    const { data } = await axios.get<User[]>(`api/user/${id}`);

    return data;
};

export { showUser };
