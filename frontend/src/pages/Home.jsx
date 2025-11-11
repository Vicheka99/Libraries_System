// src/pages/Home.jsx
import Sidebar from "../components/sidebar/home.jsx";
import Item from "../components/Item/home.jsx";

export default function Home() {
  return (
    <main className="g-main">
      <Sidebar />
      {/* Item already renders the right-side white panel + grid */}
      <Item />
    </main>
  );
}