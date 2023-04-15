import axios from "axios";
import React, { useEffect, useState } from "react";
import CommunityCard from "../../ui/CommunityCard";
import { AiOutlineSearch } from "react-icons/ai";
import { useSelector } from "react-redux";
import { useGetCommunities } from "../../utils/hooks/userHookActions";

function SelectCommunity() {
    const communities = useSelector((state) => state.community.allCommunities);
    const isLoading = useSelector((state) => state.community.loading);
    const [enabled, setEnabled] = useState(true);
    const [showSearch, setShowSearch] = useState(false);

    useGetCommunities(enabled, setEnabled);

    const handleShowSearch = () => {
        setShowSearch(true);
    };

    return (
        <div className="select-community">
            <div className="community-sidebar"></div>
            <div className="container">
                <div className="communities-list">
                    <div className="communities-header">
                        <div className="header-title">
                            <h1>Communities</h1>
                            <p>
                                Select a community you would like to be a part
                                of.
                            </p>
                        </div>
                        <form
                            className={`search-form ${
                                showSearch ? "show" : "hide"
                            }`}
                        >
                            <input
                                type="text"
                                placeholder="Search for a community"
                            />
                            <button
                                type="button"
                                onClick={() => setShowSearch(false)}
                            >
                                <AiOutlineSearch />
                            </button>
                        </form>
                        {!showSearch && (
                            <button
                                type="button"
                                className="search-icon"
                                onClick={handleShowSearch}
                            >
                                <AiOutlineSearch />
                            </button>
                        )}
                    </div>
                    {isLoading ? (
                        <span>Please wait...</span>
                    ) : (
                        <div className="communities">
                            {communities.map(({ id, name, logo }) => (
                                <CommunityCard
                                    key={id}
                                    id={id}
                                    name={name}
                                    image={logo}
                                />
                            ))}
                        </div>
                    )}
                </div>
            </div>
        </div>
    );
}

export default SelectCommunity;
