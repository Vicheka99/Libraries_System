// src/App.jsx
import { Routes, Route, Outlet } from "react-router-dom";
import Header from "./components/header/header.jsx";
import Home from "./pages/Home.jsx";
import Popular from "./pages/Popular.jsx";
import BookDetail from "./pages/BookDetail.jsx";
// in App.jsx routes (inside the Layout)
import About from "./pages/About.jsx";
import Fantasy from "./pages/fantasy.jsx";


function Layout() {
  return (
    <>
      <Header />
      <Outlet />
    </>
  );
}

export default function App() {
  return (
    <Routes>
      <Route element={<Layout />}>
        <Route path="/" element={<Home />} />
        <Route path="/popular" element={<Popular />} />
        <Route path="/book-detail" element={<BookDetail />} />
        <Route path="/about" element={<About />} />
        <Route path="/fantasy" element={<Fantasy />} />
      </Route>
    </Routes>
  );
}