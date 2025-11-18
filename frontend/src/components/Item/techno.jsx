// src/components/Item.jsx
import { Link } from "react-router-dom";
import { useState, useEffect } from "react";

export default function Item({ categoryName = "Technology & Science" }) {
  const [books, setBooks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    fetchBooks();
  }, [categoryName]);

  const fetchBooks = async () => {
    try {
      setLoading(true);
      // Fetch all books and filter on frontend, or use category name parameter
      const url = `http://localhost:8000/api/books`;
      
      const response = await fetch(url);
      
      if (!response.ok) {
        throw new Error('Failed to fetch books');
      }
      
      const data = await response.json();
      
      // Filter by category name if provided
      const filteredBooks = categoryName 
        ? data.filter(book => book.category === categoryName)
        : data;
      
      setBooks(filteredBooks);
      setError(null);
    } catch (err) {
      setError(err.message);
      console.error('Error fetching books:', err);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return <div className="text-center p-5">Loading books...</div>;
  }

  if (error) {
    return <div className="text-center p-5 text-danger">Error: {error}</div>;
  }

  if (books.length === 0) {
    return <div className="text-center p-5">No books found in this category.</div>;
  }


return (
    <section className="book-section">
      <div className="book-grid">
        {books.map(book => (
          <Link
            key={book.id}
            to={`/books/${book.id}`}      // ← dynamic route
            state={{ book }}              // ← pass full book data
            className="book-card"
            style={{ textDecoration: "none", color: "inherit" }}
          >
            <img src={book.image} alt={book.title} className="book-cover" />
            <h3 className="book-title">{book.title}</h3>
            <p className="book-author">Written by {book.author}</p>
          </Link>
        ))}
      </div>
    </section>
  );
}