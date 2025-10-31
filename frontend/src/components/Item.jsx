import { NavLink } from "react-router-dom";
export default function Item() {
  const books = [
    { id: 1, title: "XOXO", author: "Stephen R. Covey", image: "images/Book/Book1.jpg" },
    { id: 2, title: "Together Once More", author: "Robert Greene", image: "images/Book/Book2.jpg" },
    { id: 3, title: "DRIFTING HOME", author: "Don Miguel Ruiz", image: "images/Book/Book3.jpg" },
    { id: 4, title: "Sing If You Can't Dance", author: "Don Miguel Ruiz", image: "images/Book/Book4.jpg" },
    { id: 5, title: "The Songs You’ve Never Heard", author: "Don Miguel Ruiz", image: "images/Book/Book5.jpg" },
    { id: 5, title: "The Songs You’ve Never Heard", author: "Don Miguel Ruiz", image: "images/Book/Book5.jpg" },
    { id: 5, title: "The Songs You’ve Never Heard", author: "Don Miguel Ruiz", image: "images/Book/Book5.jpg" },
    { id: 5, title: "The Songs You’ve Never Heard", author: "Don Miguel Ruiz", image: "images/Book/Book5.jpg" },
    { id: 5, title: "The Songs You’ve Never Heard", author: "Don Miguel Ruiz", image: "images/Book/Book5.jpg" },
    { id: 5, title: "The Songs You’ve Never Heard", author: "Don Miguel Ruiz", image: "images/Book/Book5.jpg" },
    { id: 5, title: "The Songs You’ve Never Heard", author: "Don Miguel Ruiz", image: "images/Book/Book5.jpg" },
  ];

  return (
    <section className="book-section">
      <div className="book-grid">
        {books.map((book) => (
          <article key={book.id} className="book-card">
            <img src={book.image} alt={book.title} className="book-cover" loading="lazy" />
            <h3 className="book-title">{book.title}</h3>
            <p className="book-author">Written by {book.author}</p>
          </article>
        ))}
      </div>
    </section>
  );
}

