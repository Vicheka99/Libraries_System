// src/pages/Home.jsx
import Sidebar from "../components/sidebar/fantasy.jsx";
import Item from "../components/Item/fantasy.jsx";

export default function Fantasy() {
  return (
    <main className="g-main">
      <Sidebar />
      {/* Item already renders the right-side white panel + grid */}
      <Item />
    </main>
  );
}