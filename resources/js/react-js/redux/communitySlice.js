import { createSlice } from "@reduxjs/toolkit";

const initialState = {
    allCommunities: [],
    errors: {},
    loading: false,
    community: {},
    countries: [],
};

export const communitySlice = createSlice({
    name: "communities",
    initialState,
    reducers: {
        getAllCommunities: (state, action) => {
            state.allCommunities = action.payload;
        },
        getOneCommunity: (state, action) => {
            state.community = action.payload;
        },
        getCommunitiesErrors: (state, action) => {
            state.errors = action.payload;
        },
        setLoading: (state, action) => {
            state.loading = action.payload;
        },
        getCountries: (state, action) => {
            state.countries = action.payload;
        },
    },
});

export const {
    getAllCommunities,
    getOneCommunity,
    getCommunitiesErrors,
    setLoading,
    getCountries
} = communitySlice.actions;

export default communitySlice.reducer;
