// src/pages/Popular.jsx
import { useState, useEffect } from "react";
import { Link } from "react-router-dom";

export default function Popular() {
  const [books, setBooks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    fetchPopularBooks();
  }, []);

  const fetchPopularBooks = async () => {
    try {
      setLoading(true);
      const response = await fetch('http://localhost:8000/api/books/popular');
      
      if (!response.ok) {
        throw new Error('Failed to fetch popular books');
      }
      
      const data = await response.json();
      setBooks(data);
      setError(null);
    } catch (err) {
      setError(err.message);
      console.error('Error fetching popular books:', err);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return (
      <main className="g-main g-main--single">
        <section className="rank-panel">
          <h1 className="rank-title">Most Popular Book</h1>
          <div className="text-center p-5">Loading popular books...</div>
        </section>
      </main>
    );
  }

  if (error) {
    return (
      <main className="g-main g-main--single">
        <section className="rank-panel">
          <h1 className="rank-title">Most Popular Book</h1>
          <div className="text-center p-5 text-danger">Error: {error}</div>
        </section>
      </main>
    );
  }

  return (
    <main className="g-main g-main--single">
      <section className="rank-panel">
        <h1 className="rank-title">Most Popular Book</h1>
        <ol className="rank-list">
          {books.map((book, i) => (
            <li key={book.id} className="rank-item">
              <div className="rank-num">{i + 1}</div>
              <Link
                to={`/books/${book.id}`}
                state={{ book }}
                style={{ display: 'contents' }}
              >
                <img 
                  className="rank-cover" 
                  src={book.image || book.front_cover} 
                  alt={book.title} 
                  loading="lazy" 
                />
                <div className="rank-meta">
                  <h3 className="rank-book">{book.title}</h3>
                  <p className="rank-author">Written by {book.author}</p>
                </div>
              </Link>
            </li>
          ))}
        </ol>
      </section>
    </main>
  );
}