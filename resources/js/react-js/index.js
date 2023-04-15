import React from "react";
import * as ReactDOM from "react-dom/client";
import { BrowserRouter as Router } from "react-router-dom";
import App from "./App";
import { store } from "./redux/store";
import { Provider } from "react-redux";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";

const client = new QueryClient();

if (document.getElementById("root")) {
    const root = ReactDOM.createRoot(document.getElementById("root"));
    const app = (
        <QueryClientProvider client={client}>
            <Provider store={store}>
                <Router>
                    <App />
                </Router>
            </Provider>
        </QueryClientProvider>
    );

    root.render(app);
}
