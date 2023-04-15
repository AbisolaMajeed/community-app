import React from "react";
import { Routes, Route } from "react-router-dom";
import CommunityAuth from "./pages/auth/CommunityAuth";
import Login from "./pages/auth/Login";
import SelectCommunity from "./pages/auth/SelectCommunity";
import UserAuth from "./pages/auth/UserAuth";
import Dashboard from "./pages/Dashboard";

function App() {
    return (
        <div className="app">
            <Routes>
                <Route index path="/app/*" element={<CommunityAuth />} />
                <Route index path="/app/user/register/*" element={<UserAuth />} />
                <Route index path="/app/login" element={<Login />} />
                <Route
                    path="/app/select-community"
                    element={<SelectCommunity />}
                />
                <Route
                    path="/app/dashboard"
                    element={<Dashboard />}
                />
                <Route path="/*" element={"error"} />
            </Routes>
        </div>
    );
}

export default App;
