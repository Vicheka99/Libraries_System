// src/pages/Home.jsx
import Sidebar from "../components/sidebar/self.jsx";
import Item from "../components/Item/self.jsx";

export default function Fantasy() {
  return (
    <main className="g-main">
      <Sidebar />
      {/* Item already renders the right-side white panel + grid */}
      <Item />
    </main>
  );
}