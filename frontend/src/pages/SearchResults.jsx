import { Link, useSearchParams } from "react-router-dom";
import { useState, useEffect, useCallback } from "react";

export default function SearchResults() {
  const [searchParams] = useSearchParams();
  const query = searchParams.get("q") || "";
  const [books, setBooks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const fetchBooks = useCallback(async () => {
    try {
      setLoading(true);
      const response = await fetch(`http://localhost:8000/api/books`);
      
      if (!response.ok) {
        throw new Error('Failed to fetch books');
      }
      
      const data = await response.json();
      
      // Filter books by title or author matching the search query
      const filteredBooks = data.filter(book => 
        book.title.toLowerCase().includes(query.toLowerCase()) ||
        book.author.toLowerCase().includes(query.toLowerCase())
      );
      
      setBooks(filteredBooks);
      setError(null);
    } catch (err) {
      setError(err.message);
      console.error('Error fetching books:', err);
    } finally {
      setLoading(false);
    }
  }, [query]);

  useEffect(() => {
    if (query) {
      fetchBooks();
    }
  }, [query, fetchBooks]);

  if (loading) {
    return <div className="text-center p-5">Searching...</div>;
  }

  if (error) {
    return <div className="text-center p-5 text-danger">Error: {error}</div>;
  }

  return (
    <main className="g-main">
      <section className="book-section" style={{ padding: '2rem' }}>
        <h2>Search Results for "{query}"</h2>
        <p className="text-muted">{books.length} book(s) found</p>
        
        {books.length === 0 ? (
          <div className="text-center p-5">
            <p>No books found matching your search.</p>
            <Link to="/" className="btn btn-primary">← Back to Home</Link>
          </div>
        ) : (
          <div className="book-grid">
            {books.map(book => (
              <Link
                key={book.id}
                to={`/books/${book.id}`}
                state={{ book }}
                className="book-card"
                style={{ textDecoration: "none", color: "inherit" }}
              >
                <img src={book.image} alt={book.title} className="book-cover" />
                <h3 className="book-title">{book.title}</h3>
                <p className="book-author">Written by {book.author}</p>
                <span className="badge bg-secondary">{book.category}</span>
              </Link>
            ))}
          </div>
        )}
      </section>
    </main>
  );
}
