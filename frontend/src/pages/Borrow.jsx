import React, { useState } from "react";
import "./BorrowBook.css";

function BorrowBook() {
  const [formData, setFormData] = useState({
    firstName: "",
    lastName: "",
    email: "",
    phone: "",
    agreeReturn: false,
    acceptPolicy: false,
  });

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: type === "checkbox" ? checked : value,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (!formData.agreeReturn || !formData.acceptPolicy) {
      alert("Please agree to all terms before borrowing.");
      return;
    }
    alert("Book borrowed successfully!");
    console.log(formData);
  };

  return (
    <div className="borrow-container">
      <div className="book-section">
        <img
          src="https://m.media-amazon.com/images/I/71tbalAHYCL.jpg"
          alt="Ikigai Book"
          className="book-cover"
        />
        <h3>Ikigai: The Japanese Secret to a Long and Happy Life</h3>
        <p>Written by Héctor García and Francesc Miralles</p>
      </div>

      <div className="form-section">
        <h2>Borrow a Book</h2>
        <form onSubmit={handleSubmit}>
          <h4>Personal Information</h4>
          <div className="form-row">
            <div>
              <label>First Name</label>
              <input
                type="text"
                name="firstName"
                value={formData.firstName}
                onChange={handleChange}
              />
            </div>
            <div>
              <label>Last Name</label>
              <input
                type="text"
                name="lastName"
                value={formData.lastName}
                onChange={handleChange}
              />
            </div>
          </div>

          <label>Email Address *</label>
          <input
            type="email"
            name="email"
            value={formData.email}
            onChange={handleChange}
            required
          />

          <label>Phone Number *</label>
          <div className="phone-input">
            <span className="flag">🇰🇭 +885</span>
            <input
              type="tel"
              name="phone"
              value={formData.phone}
              onChange={handleChange}
              required
            />
          </div>

          <h4>Book Detail</h4>
          <p>• Ikigai: The Japanese Secret to a Long and Happy Life × 1</p>

          <div className="checkboxes">
            <label>
              <input
                type="checkbox"
                name="agreeReturn"
                checked={formData.agreeReturn}
                onChange={handleChange}
              />
              I agree to return the book on or before the due date.
            </label>

            <label>
              <input
                type="checkbox"
                name="acceptPolicy"
                checked={formData.acceptPolicy}
                onChange={handleChange}
              />
              I accept GEN Z Library Borrowing Policy.
            </label>
          </div>

          <button type="submit" className="borrow-btn">
            Borrow Now
          </button>
        </form>
      </div>
    </div>
  );
}

export default BorrowBook;
