import { useDispatch } from "react-redux";
import { useEffect } from "react";
import { useQuery, useQueryClient } from "@tanstack/react-query";
import axios from "axios";
import {
    getAllCommunities,
    getCommunitiesErrors,
    getCountries,
    getOneCommunity,
    setLoading,
} from "../../redux/communitySlice";

const useGetCommunities = (enabled, setEnabled) => {
    const queryClient = useQueryClient();
    const dispatch = useDispatch();

    const { data, error, refetch, isLoading } = useQuery({
        queryKey: ["allCommunities"],
        queryFn: () =>
            axios.get("/community").then((data) => {
                const result = data.data.payload;
                return result;
            }),
        enabled,
        retry: 1,
    });

    useEffect(() => {
        if (isLoading) {
            dispatch(setLoading(isLoading));
        }
        if (data) {
            dispatch(setLoading(false));
            dispatch(getAllCommunities(data));
            setEnabled(false);
        }
        if (error) {
            setEnabled(false);
            queryClient.removeQueries(["allCommunities"]);
            let errMessage = error?.response?.data;
            dispatch(getCommunitiesErrors(errMessage));
        }
    }, [dispatch, isLoading, data, error, setEnabled, queryClient]);

    return { data, refetch };
};

const useGetCommunity = (enabled, setEnabled, community_id) => {
    const queryClient = useQueryClient();
    const dispatch = useDispatch();

    const { data, error, refetch, isLoading } = useQuery({
        queryKey: ["oneCommunity"],
        queryFn: () =>
            axios.get(`/community/${community_id}`).then((data) => {
                const result = data.data.payload;
                return result;
            }),
        enabled,
        retry: 1,
    });

    useEffect(() => {
        if (isLoading) {
            dispatch(setLoading(isLoading));
        }
        if (data) {
            dispatch(setLoading(false));
            dispatch(getOneCommunity(data));
            setEnabled(false);
        }
        if (error) {
            setEnabled(false);
            queryClient.removeQueries(["communityWorkflow"]);
            let errMessage = error?.response?.data;
            dispatch(getCommunitiesErrors(errMessage));
        }
    }, [dispatch, isLoading, data, error, setEnabled, queryClient]);

    return { data, refetch };
};
const useGetCountries = (enabled, setEnabled, community_id) => {
    const queryClient = useQueryClient();
    const dispatch = useDispatch();

    const { data, error, refetch, isLoading } = useQuery({
        queryKey: ["countries"],
        queryFn: () =>
            axios
                .get(`/community/country/list?community_id=${community_id}`)
                .then((data) => {
                    const result = data.data.payload;
                    return result;
                }),
        enabled,
        retry: 1,
    });

    useEffect(() => {
        if (isLoading) {
            dispatch(setLoading(isLoading));
        }
        if (data) {
            dispatch(setLoading(false));
            dispatch(getCountries(data));
            setEnabled(false);
        }
        if (error) {
            setEnabled(false);
            queryClient.removeQueries(["countries"]);
            let errMessage = error?.response?.data;
            dispatch(getCommunitiesErrors(errMessage));
        }
    }, [dispatch, isLoading, data, error, setEnabled, queryClient]);

    return { data, refetch };
};
export { useGetCommunities, useGetCommunity, useGetCountries };
