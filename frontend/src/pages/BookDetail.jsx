// src/pages/BookDetail.jsx
import { useParams, Link, useLocation } from "react-router-dom";
import { useEffect, useState } from "react";

export default function BookDetail() {
  const { id } = useParams();
  const { state } = useLocation();
  const passedBook = state?.book;

  const [book, setBook] = useState(passedBook || null);

  useEffect(() => {
    // If you want a fallback fetch later, do it here with id.
  }, [id]);

  if (!book) {
    return (
      <main className="container">
        <h1>Book not found</h1>
        <Link to="/">← Back Home</Link>
      </main>
    );
  }

  return (
    <main className="detail-page">
      {/* decorative bg */}
      <div className="detail-hero" />

      <div className="detail-wrap container">
        <aside className="detail-cover">
          <img src={book.image || book.coverUrl} alt={book.title} />
        </aside>

        <section className="detail-info">
          <h1 className="detail-title">{book.title}</h1>
          <p className="detail-author">
            <span>Author:</span> {book.author || (book.authors?.join(", ") ?? "Unknown")}
          </p>

          <p className="detail-desc">
            {book.description || book.summary || "No description yet."}
          </p>

          <div className="detail-thumbs">
            <img src={book.image || book.coverUrl} alt="" />
            <img src={book.image || book.coverUrl} alt="" />
            <img src="/images/Book/books-icon.png" alt="" />
          </div>

          <div className="detail-actions">
            <button className="btn btn--primary">Read Online</button>
              <Link
                to={`/borrow/${book.id}`}
                state={{ book }}                 // pass book to Borrow page
                className="btn btn--primary"
                style={{ textDecoration:"none" }}>Borrow</Link>
            <Link to="/" className="btn btn--link">← Back Home</Link>
          </div>
        </section>
      </div>
    </main>
  );
}





