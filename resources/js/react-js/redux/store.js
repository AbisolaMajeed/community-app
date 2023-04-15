import { configureStore } from "@reduxjs/toolkit";
import authSlice from "./authSlice";
import communitySlice from "./communitySlice";

export const store = configureStore({
    reducer: {
        auth: authSlice,
        community: communitySlice
    }
})