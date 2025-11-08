// src/pages/Borrow.jsx
import { useLocation, useParams, Link, useNavigate } from "react-router-dom";
import { useState } from "react";

export default function Borrow() {
  const { id } = useParams();
  const { state } = useLocation();
  const navigate = useNavigate();
  const book = state?.book;

  if (!book) {
    return (
      <main className="container" style={{ padding: 20 }}>
        <h2>We couldn’t load that book.</h2>
        <p>Open this page by clicking “Borrow” on the book’s detail page.</p>
        <Link to="/">← Back Home</Link>
      </main>
    );
  }

  const [form, setForm] = useState({
    firstName: "",
    lastName: "",
    email: "",
    phoneCode: "+855",
    phone: "",
    agreeReturn: false,
    agreePolicy: false,
  });

  const [showPopup, setShowPopup] = useState(false); // 👈 control popup visibility

  function update(e) {
    const { name, value, type, checked } = e.target;
    setForm(f => ({ ...f, [name]: type === "checkbox" ? checked : value }));
  }

  function submit(e) {
    e.preventDefault();
    if (!form.agreeReturn || !form.agreePolicy) {
      alert("Please accept both checkboxes to continue.");
      return;
    }
    // Simulate successful request
    console.log("Borrowed:", book.title, form);
    setShowPopup(true); // 👈 show popup
  }

  return (
    <main className="borrow-page">
      <div className="borrow-wrap container">
        <aside className="borrow-left">
          <img className="borrow-cover" src={book.image || book.coverUrl} alt={book.title} />
          <h3 className="borrow-title">{book.title}</h3>
          <p className="borrow-author">Written by {book.author || "Unknown"}</p>

          <div className="borrow-thumbs">
            <img src={book.image || book.coverUrl} alt="" />
            <img src={book.image || book.coverUrl} alt="" />
            <img src="/images/Book/books-icon.png" alt="" />
          </div>
        </aside>

        <section className="borrow-panel">
          <h2>Borrow a Book</h2>

          <form onSubmit={submit} className="borrow-form">
            <h4>Personal information</h4>

            <div className="row">
              <div className="col">
                <label>First Name</label>
                <input name="firstName" value={form.firstName} onChange={update} />
              </div>
              <div className="col">
                <label>Last Name</label>
                <input name="lastName" value={form.lastName} onChange={update} />
              </div>
            </div>

            <label>Email Address *</label>
            <input type="email" required name="email" value={form.email} onChange={update} />

            <label>Phone Number *</label>
            <div className="phone-row">
              <input className="code" name="phoneCode" value={form.phoneCode} onChange={update} />
              <input className="num" name="phone" required value={form.phone} onChange={update} />
            </div>

            <div className="divider" />
            <h4>Book Detail</h4>
            <div className="bookline">
              <span>{book.title}</span>
              <span>x1</span>
            </div>

            <label className="check">
              <input type="checkbox" name="agreeReturn" checked={form.agreeReturn} onChange={update} />
              I agree to return the book on or before the due date.
            </label>
            <label className="check">
              <input type="checkbox" name="agreePolicy" checked={form.agreePolicy} onChange={update} />
              I accept GEN Z Library Borrowing Policy
            </label>

            <div className="actions">
              <button className="btn btn--primary" type="submit">Borrow Now</button>
            </div>
          </form>
        </section>
      </div>

      {/* ✅ Popup overlay */}
      {showPopup && (
        <div className="popup-overlay">
          <div className="popup-card">
            <div className="popup-icon">✔</div>
            <h2>Thank You for borrowing a Book!</h2>
            <p>You’ve successfully borrowed</p>
            <p className="popup-book">
              [{book.title}]
            </p>
            <p>You’ll receive an Email confirmation shortly</p>

            <Link to="/" className="btn btn--primary" style={{marginTop: "14px"}}>
              Back To Home →
            </Link>
          </div>
        </div>
      )}
    </main>
  );
}