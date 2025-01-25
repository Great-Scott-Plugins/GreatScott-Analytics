import Header from "./Header";

import {NavMenu} from "@/admin/settings/components/NavMenu.tsx";

export default function App() {
    return (
        <div>
            <Header />

            <div className="p-4 border border-b-2 border-indigo-100">
                <h1>GreatScott Analytics</h1>
            </div>
            <div className="bg-white px-4 pt-2">
                <NavMenu />
            </div>
        </div>
    )
}
