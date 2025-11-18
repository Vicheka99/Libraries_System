// src/pages/Home.jsx
import Sidebar from "../components/sidebar/worldLiterature.jsx";
import Item from "../components/Item/WorldLiterature.jsx";

export default function Fantasy() {
  return (
    <main className="g-main">
      <Sidebar />
      {/* Item already renders the right-side white panel + grid */}
      <Item /> 
    </main>
  );
}