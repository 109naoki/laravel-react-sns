import { useQuery, useMutation, useQueryClient } from "react-query";

import * as api from "../api/user/UserApi";

const useGetUser = (id: string) => {
    return useQuery("user", () => api.showUser(id));
};

export { useGetUser };
