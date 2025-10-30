import { NavLink } from "react-router-dom";

export default function Header() {
  return (
    <header className="g-header">
      <div className="g-logo">
        <img src="/Image/logo/GenZ_logo.png" alt="GENZ Library Logo" />
        <h2>GEN Z Library</h2>
      </div>

      <nav>
        <ul>
          <li>
            <NavLink to="/" end className="g-link">
              Home
            </NavLink>
          </li>
          <li>
            <NavLink to="/popular" className="g-link">
              Popular
            </NavLink>
          </li>
          <li>
            <NavLink to="/book-detail" className="g-link">
              Book Detail
            </NavLink>
          </li>
          <li>
            <NavLink to="/xxx" className="g-link">
              XXX
            </NavLink>
          </li>
        </ul>
      </nav>

      <div className="g-search">
        <i className="bi bi-search" aria-hidden="true"></i>
        <input type="text" placeholder="Search for books" aria-label="Search for books" />
      </div>
    </header>
  );
}
