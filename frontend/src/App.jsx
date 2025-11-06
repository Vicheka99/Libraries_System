// src/App.jsx
import { Routes, Route, Outlet } from "react-router-dom";
import Header from "./components/header/header.jsx";
import Home from "./pages/Home.jsx";
import Popular from "./pages/Popular.jsx";
import BookDetail from "./pages/BookDetail.jsx";
// in App.jsx routes (inside the Layout)
import About from "./pages/About.jsx";
import Fantasy from "./pages/fantasy.jsx";
import Children from "./pages/Children.jsx";
import SelfHelp from "./pages/Selfhelp.jsx";
import Donations from './pages/Donations.jsx';
import Borrow from "./pages/Borrow.jsx"; // 👈 new
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
        <Route path="/donations" element={<Donations />} />
        <Route path="/about" element={<About />} />
        <Route path="/fantasy" element={<Fantasy />} />
        <Route path="/child" element={<Children />} />
        <Route path="/self-help" element={<SelfHelp />} />
      {/* One dynamic page for ALL books */}
        <Route path="/books/:id" element={<BookDetail />} />
        <Route path="/borrow/:id" element={<Borrow />} />  {/* 👈 new */}
      </Route>
    </Routes>
  );
}

