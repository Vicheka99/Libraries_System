// src/pages/Home.jsx
import Sidebar from "../components/sidebar.jsx";
import Item from "../components/Item.jsx";

export default function Home() {
  return (
    <main className="g-main">
      <Sidebar />
      {/* Item already renders the right-side white panel + grid */}
      <Item />
    </main>
  );
}