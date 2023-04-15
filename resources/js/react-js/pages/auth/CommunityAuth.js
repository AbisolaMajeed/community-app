import React from "react";
import { Route, Routes } from "react-router-dom";
import CommunityForm from "../../components/Community";
import SetPassword from "../../components/SetPassword";
import AdminForm from "../../components/AdminInfo";
import CheckEmail from "../../components/CheckEmail";

export default function CommunityAuth() {
    return (
        <div className="auth-page">
            <div className="auth-left">
                <h1>Welcome to eCommunity</h1>
                <p>Sign up to enjoy the full benefits of community</p>
            </div>
            <div className="auth-right">
                <div className="container">
                    <Routes>
                        <Route index element={<CommunityForm />} />
                        <Route path="create-account" element={<AdminForm />} />
                        <Route
                            path="set-password/:uid"
                            element={<SetPassword />}
                        />
                        <Route
                            path="check-email"
                            element={<CheckEmail />}
                        />
                    </Routes>
                </div>
            </div>
        </div>
    );
}
