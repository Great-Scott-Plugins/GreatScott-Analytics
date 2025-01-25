export default function Header() {
    return (
        <header className="bg-blue-700 px-5 py-4 flex flex-row flex-nowrap justify-between">
            <p className="text-base! m-0! text-white!">
                <span className="font-bold">You're using GreatScott Analytics Lite.</span>
                To unlock all features, consider <a className="underline text-white!" href="#">upgrading to Pro</a>.
            </p>
            <span className="text-white!">X</span>
        </header>
    )
}
