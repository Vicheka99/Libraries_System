import { NavLink } from "react-router-dom";

export default function Sidebar() {
  return (
    <aside className="g-sidebar">
      <ul>
        <li>
          <NavLink to="/romance" className="g-sidebar-link">
            <strong>Home Page</strong>
          </NavLink>
        </li>
        <li>
          <NavLink to="/fantasy" className="g-sidebar-link">
            Fantasy and Science
          </NavLink>
        </li>
        <li>
          <NavLink to="/children" className="g-sidebar-link">
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
