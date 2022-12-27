import styled from "styled-components";
import React, { useState } from "react";
import { usePosts, useCreatePost, useUpdatePost } from "../../query/PostQuery";
import { PostInput } from "./PostInput";
import { PostList } from "./PostList";
import { User } from "../../types/User";

export const Home = () => {
    return (
        <Sbody>
            <PostInput />
            <Sdiv>
                <Snav>left</Snav>

                <Smain>
                    <PostList />
                </Smain>
                <Saside>right</Saside>
            </Sdiv>
            <Sfooter>footer</Sfooter>
        </Sbody>
    );
};

const Sbody = styled.div`
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
`;
const SHeader = styled.header`
    outline: 1px solid gray;
    background-color: lightcyan;
    height: 100px;
`;

const Sdiv = styled.div`
    display: flex;
    flex: 1;
`;

const Smain = styled.main`
    outline: 1px solid gray;
    flex: 1;
`;
const Snav = styled.nav`
    outline: 1px solid gray;
    width: 150px;
`;
const Saside = styled.aside`
    outline: 1px solid gray;
    width: 200px;
`;
const Sfooter = styled.footer`
    outline: 1px solid gray;
    background-color: lightcyan;
    height: 100px;
`;
