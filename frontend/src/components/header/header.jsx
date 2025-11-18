import { NavLink, useNavigate } from "react-router-dom";
import { useState } from "react";

export default function Header() {
  const [searchQuery, setSearchQuery] = useState("");
  const navigate = useNavigate();

  const handleSearch = (e) => {
    e.preventDefault();
    if (searchQuery.trim()) {
      navigate(`/search?q=${encodeURIComponent(searchQuery.trim())}`);
    }
  };

  return (
    <header className="g-header">
      <div className="g-logo">
        <img src="/images/Image/logo/GenZ_logo.png" alt="GENZ Library Logo" />
        <h2>GEN Z Library</h2>
      </div>

      <nav>
        <ul>
          <li>
            <NavLink
              to="/"
              end
              className={({ isActive }) => isActive ? "g-link active" : "g-link"}
              style={({ isActive }) => ({ fontWeight: isActive ? "bold" : "normal" })}
            >
              Home
            </NavLink>
          </li>
          <li>
            <NavLink
              to="/popular"
              className={({ isActive }) => isActive ? "g-link active" : "g-link"}
              style={({ isActive }) => ({ fontWeight: isActive ? "bold" : "normal" })}
            >
              Popular
            </NavLink>
          </li>
          <li>
            <NavLink
              to="/donations"
              className={({ isActive }) => isActive ? "g-link active" : "g-link"}
              style={({ isActive }) => ({ fontWeight: isActive ? "bold" : "normal" })}
            >
              Donations
            </NavLink>
          </li>
          <li>
            <NavLink
              to="/about"
              className={({ isActive }) => isActive ? "g-link active" : "g-link"}
              style={({ isActive }) => ({ fontWeight: isActive ? "bold" : "normal" })}
            >
              About Us
            </NavLink>
          </li>
        </ul>
      </nav>

      <form onSubmit={handleSearch} className="g-search">
        <i className="bi bi-search" aria-hidden="true"></i>
        <input
          type="text"
          placeholder="Search for books"
          aria-label="Search for books"
          value={searchQuery}
          onChange={(e) => setSearchQuery(e.target.value)}
        />
      </form>
    </header>
  );
}
