import { Routes, Route } from "react-router-dom";
import Header from "./components/Header.jsx";
import Home from "./pages/Home.jsx";
import Popular from "./pages/Popular.jsx";
import BookDetail from "./pages/BookDetail.jsx";

export default function App() {
  return (
    <>
      <Header />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/popular" element={<Popular />} />
        <Route path="/book-detail" element={<BookDetail />} />
      </Routes>
    </>
  );
}
