import React from "react";
import { MdArrowBackIos, MdHome } from "react-icons/md";
import { Link, Route, Routes } from "react-router-dom";
import BasicInfoAuth from "../../components/BasicInfoAuth";
import CommunityWorkflow from "../../components/CommunityWorkflow";
import ContactInfoAuth from "../../components/ContactInfoAuth";
import OtherInfoAuth from "../../components/OtherInfoAuth";
import UserAuthDetails from "../../components/UserAuthDetails";
import UserProfileAvatar from "../../components/UserProfileAvatar";

function UserAuth() {
    return (
        <div className="auth-page">
            <div className="auth-left user">
                <h1>Welcome to eCommunity</h1>
                <p>Sign up to enjoy the full benefits of community</p>
            </div>
            <div className="auth-right">
                <div className="container">
                    <div className="auth-header-btns">
                        <Link to={-1}>
                            <button title="Back">
                                <MdArrowBackIos />
                            </button>
                        </Link>
                        <a href={"/"}>
                            <button title="Home">
                                <MdHome />
                            </button>
                        </a>
                    </div>
                    <Routes>
                        <Route index element={<CommunityWorkflow />} />
                        <Route
                            path={"basic-information"}
                            element={<BasicInfoAuth />}
                        />
                        <Route
                            path="contact-information"
                            element={<ContactInfoAuth />}
                        />
                        <Route
                            path="upload-profile-avatar"
                            element={<UserProfileAvatar />}
                        />
                        <Route
                            path="other-information"
                            element={<OtherInfoAuth />}
                        />

                        <Route path="signup" element={<UserAuthDetails />} />
                    </Routes>
                </div>
            </div>
        </div>
    );
}

export default UserAuth;
