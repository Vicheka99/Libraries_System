// src/App.jsx
import { Routes, Route, Outlet } from "react-router-dom";
import Header from "./components/header/header.jsx";
import Home from "./pages/Home.jsx";
import Popular from "./pages/Popular.jsx";
import BookDetail from "./pages/BookDetail.jsx";
import WorldLiterature from './pages/WorldLiterature';
import SearchResults from "./pages/SearchResults.jsx";

// in App.jsx routes (inside the Layout)
import About from "./pages/About.jsx";
import Khmer_Literature from "./pages/Khmerliterature.jsx";
import Education_Research from "./pages/Educational.jsx";
import Self_Improvement from "./pages/Selfhelp.jsx";
import World_Literature from "./pages/WorldLiterature.jsx";
import Technology from "./pages/Techno.jsx";
import Donations from './pages/Donations.jsx';
import Borrow from "./pages/Borrow.jsx"; 
import ReadOnline from "./pages/ReadOnline.jsx"; 
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
        <Route path="/Education_Research" element={<Education_Research />} />
        <Route path="/Khmer_Literature" element={<Khmer_Literature  />} />
        <Route path="/Self_Improvement" element={<Self_Improvement />} />
        <Route path="/World_Literature" element={<WorldLiterature />} />
         <Route path="/Technology" element={<Technology/>} />
        <Route path="/search" element={<SearchResults />} />
      {/* One dynamic page for ALL books */}
        <Route path="/books/:id" element={<BookDetail />} />
        <Route path="/borrow/:id" element={<Borrow />} />  {/* 👈 new */}
        <Route path="/read/:id" element={<ReadOnline />} />  {/* 👈 Read Online */}
      </Route>
    </Routes>
  );
}

