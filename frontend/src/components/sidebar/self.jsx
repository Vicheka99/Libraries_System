import { NavLink } from "react-router-dom";

export default function Sidebar() {
  return (
    <aside className="g-sidebar">
      <ul>
        <li>
          <NavLink to="/" className="g-sidebar-link">
            Home Page
          </NavLink>
        </li>
        <li>
          <NavLink to="/Education_Research " className="g-sidebar-link">
             Education & Research 
          </NavLink>
        </li>
        <li>
          <NavLink to="/Khmer_Literature " className="g-sidebar-link">
           Khmer Literature & Culture
          </NavLink>
        </li>
        <li>
          <NavLink to="/Self_Improvement" className="g-sidebar-link">
            <strong>Self-Improvement</strong>
          </NavLink>
        </li>
        <li>
          <NavLink to="/Technology" className="g-sidebar-link">
            Techonology & Science
          </NavLink>
        </li>
      </ul>
    </aside>
  );
}
