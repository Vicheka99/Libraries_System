// src/pages/BookDetail.jsx
import { useParams, Link, useLocation } from "react-router-dom";
import { useEffect, useState, useCallback } from "react";

export default function BookDetail() {
  const { id } = useParams();
  const { state } = useLocation();
  const passedBook = state?.book;

  const [book] = useState(passedBook || null);

  const incrementViewCount = useCallback(async () => {
    try {
      await fetch(`http://localhost:8000/api/books/${id}/view`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
      });
    } catch (error) {
      console.error('Error incrementing view count:', error);
    }
  }, [id]);

  useEffect(() => {
    // Increment view count when book detail page is viewed
    if (id) {
      incrementViewCount();
    }
  }, [id, incrementViewCount]);

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
          {/* Only show front cover if it exists */}
          {book.front_cover && (
            <img src={book.front_cover} alt={`${book.title} - Front Cover`} />
          )}
          {/* Fallback to 'image' field if front_cover doesn't exist */}
          {!book.front_cover && book.image && (
            <img src={book.image} alt={book.title} />
          )}
          
          {/* Show back cover if it exists */}
          {book.back_cover && (
            <img src={book.back_cover} alt={`${book.title} - Back Cover`} style={{ marginTop: '10px' }} />
          )}
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
            {/* Show front cover thumbnail if exists */}
            {(book.front_cover || book.image) && (
              <img src={book.front_cover || book.image} alt="Front Cover" />
            )}
            
            {/* Show back cover thumbnail if exists */}
            {book.back_cover && (
              <img src={book.back_cover} alt="Back Cover" />
            )}
          </div>

          <div className="detail-actions">
            {book.file_path ? (
              <Link
                to={`/read/${book.id}`}
                state={{ book }}
                className="btn btn--primary"
                style={{ textDecoration: "none" }}
              >
                Read Online
              </Link>
            ) : (
              <button className="btn btn--primary" disabled title="File not available">
                Read Online
              </button>
            )}
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





