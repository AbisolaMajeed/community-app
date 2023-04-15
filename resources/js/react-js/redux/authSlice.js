import { createSlice } from "@reduxjs/toolkit";

const savedCommunity = sessionStorage.getItem("community_name");

const initialState = {
    avatar: null,
    community: {
        community_id: "",
        name: savedCommunity || "",
    },
    admin: {
        first_name: "",
        last_name: "",
        email: "",
        phone_number: "",
    },
    user: {
        auth: {
            email: "",
            password: "",
        },
        basic_info: {
            title: "",
            first_name: "",
            last_name: "",
            other_names: "",
            date_of_birth: "",
        },
        contact: {
            phone_number: "",
            home_address: "",
            date_arrived: "",
            closest_landmark: "",
        },
        others: {
            occupation: "",
            education: "",
        },
        workflow: [],
    },
    errors: {},
};

export const authSlice = createSlice({
    name: "auth",
    initialState,
    reducers: {
        saveAvatar: (state, action) => {
            state.avatar = action.payload;
        },
        saveCommunity: (state, action) => {
            state.community.name = action.payload;
        },
        saveCommunityID: (state, action) => {
            state.community.community_id = action.payload;
        },
        saveAdmin: (state, action) => {
            state.admin = action.payload;
        },
        backErrors: (state, action) => {
            state.errors = action.payload;
        },
        saveUserAuth: (state, action) => {
            state.user.auth = action.payload;
        },
        saveUserInfo: (state, action) => {
            state.user.basic_info = action.payload;
        },
        saveUserContact: (state, action) => {
            state.user.contact = action.payload;
        },
        saveUserOtherInfo: (state, action) => {
            state.user.others = action.payload;
        },
        saveUserCommunityWorkflow: (state, action) => {
            state.user.workflow.push(action.payload);
        },
    },
});

export const {
    saveAvatar,
    saveCommunity,
    saveCommunityID,
    saveAdmin,
    backErrors,
    saveUserAuth,
    saveUserContact,
    saveUserInfo,
    saveUserOtherInfo,
    saveUserCommunityWorkflow,
} = authSlice.actions;

export default authSlice.reducer;
