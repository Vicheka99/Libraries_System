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
            Fantasy Fantasy and Science
          </NavLink>
        </li>
        <li>
          <NavLink to="/child" className="g-sidebar-link">
            Children’s Books
          </NavLink>
        </li>
        <li>
          <NavLink to="/self-help" className="g-sidebar-link">
            <strong>Self-help’s Books</strong>
          </NavLink>
        </li>
      </ul>
    </aside>
  );
}
