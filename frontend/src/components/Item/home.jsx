// src/components/Item.jsx
import { Link } from "react-router-dom";

export default function Item() {
  const books = [
    {
      id: 1,
      title: "XOXO",
      author: "Stephen R. Covey",
      description: "According to the Japanese, everyone has an ikigai—a reason for living. And according to the residents of the Japanese village with the world’s longest-living people, finding it is the key to a happier and longer life. Having a strong sense of ikigai—where what you love, what you’re good at, what you can get paid for, and what the world needs all overlap—means that each day is infused with meaning. It’s the reason we get up in the morning. It’s also the reason many Japanese never really retire (in fact there’s no word in Japanese that means retire in the sense it does in English): They remain active and work at what they enjoy, because they’ve found a real purpose in life—the happiness of always being busy.  In researching this book, the authors interviewed the residents of the Japanese village with the highest percentage of 100-year-olds—one of the world’s Blue Zones. Ikigai reveals the secrets to their longevity and happiness: how they eat, how they move, how they work, how they foster collaboration and community, and—their best-kept secret—how they find the ikigai that brings satisfaction to their lives. And it provides practical tools to help you discover your own ikigai. Because who doesn’t want to find happiness in every day?",
      image: "/images/Book/Book1.jpg",
    },
    {
      id: 2,
      title: "Together Once More",
      author: "Robert Greene",
      image: "/images/Book/Book2.jpg",
    },
    {
      id: 3,
      title: "DRIFTING HOME",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book3.jpg",
    },
    {
      id: 4,
      title: "Sing If You Can't Dance",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book4.jpg",
    },
    {
      id: 5,
      title: "The SONGS you're NEVER Heard",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book5.jpg",
    },
    {
      id: 6,
      title: "16 October",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book6.jpg",
    },
    {
      id: 7,
      title: "Our walk Home",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book7.jpg",
    },
    {
      id: 8,
      title: "Lovers By The Sea",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book8.jpg",
    },
    {
      id: 9,
      title: "My CAPRICORN Friend",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book9.jpg",
    },
    {
      id: 10,
      title: "The New Kid in School",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book10.jpg",
    },
    {
      id: 11,
      title: "The Newjkh Kid in School",
      author: "Don Miguel Rduiz",
      image: "/images/Book/Book10.jpg",
    },
  ];

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