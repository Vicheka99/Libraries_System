// src/pages/Home.jsx
import Sidebar from "../components/sidebar/sidebarfan.jsx";
import Item from "../components/Item.jsx";

export default function Fantasy() {
  return (
    <main className="g-main">
      <Sidebar />
      {/* Item already renders the right-side white panel + grid */}
      <Item />
    </main>
  );
}