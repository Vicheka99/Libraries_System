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
          <NavLink to="/fantasy" className="g-sidebar-link">
            <strong>Fantasy Fantasy and Science</strong>
          </NavLink>
        </li>
        <li>
          <NavLink to="/child" className="g-sidebar-link">
            Children’s Books
          </NavLink>
        </li>
        <li>
          <NavLink to="/self-help" className="g-sidebar-link">
            Self-help’s Books
          </NavLink>
        </li>
      </ul>
    </aside>
  );
}
