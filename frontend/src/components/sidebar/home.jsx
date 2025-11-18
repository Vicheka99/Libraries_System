import { NavLink } from "react-router-dom";

export default function Sidebar() {
  return (
    <aside className="g-sidebar">
      <ul>
        <li>
          <NavLink to="/" className="g-sidebar-link">
            <strong>Home Page</strong>
          </NavLink>
        </li>
        <li>
          <NavLink to="/Education_Research" className="g-sidebar-link">
            Education & Research
          </NavLink>
        </li>
        <li>
          <NavLink to="/Khmer_Literature" className="g-sidebar-link">
            Khmer Literature & Culture
          </NavLink>
        </li>
        <li>
          <NavLink to="/Self_Improvement" className="g-sidebar-link">
            Self-Improvement
          </NavLink>
        </li>
        <li>
          <NavLink to="/Technology" className="g-sidebar-link">
            Technology & Science
          </NavLink>
        </li>
      </ul>
    </aside>
  );
}
