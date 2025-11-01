import Sidebar from "../components/sidebar";
import Header from "../components/header";

export default function Popular() {
  const popular = [
    { id: 101, title: "The 48 Laws of Power", author: "Robert Greene", image: "Image/books/power.jpg", borrows: 982 },
    { id: 102, title: "Atomic Habits", author: "James Clear", image: "/Image/books/atomic-habits.jpg", borrows: 911 },
    { id: 103, title: "The Four Agreements", author: "Don Miguel Ruiz", image: "/Image/books/four-agreements.jpg", borrows: 876 },
    { id: 104, title: "The Subtle Art of Not Giving a F*ck", author: "Mark Manson", image: "/Image/books/subtle-art.jpg", borrows: 862 },
    { id: 105, title: "The 7 Habits of Highly Effective People", author: "Stephen R. Covey", image: "/Image/books/seven-habits.jpg", borrows: 844 },
    { id: 106, title: "Deep Work", author: "Cal Newport", image: "/Image/books/deep-work.jpg", borrows: 799 },
    { id: 107, title: "Can’t Hurt Me", author: "David Goggins", image: "/Image/books/cant-hurt-me.jpg", borrows: 786 },
    { id: 108, title: "Outliers", author: "Malcolm Gladwell", image: "/Image/books/outliers.jpg", borrows: 755 },
  ];

  // simple sort: highest borrows first
  const sorted = [...popular].sort((a, b) => b.borrows - a.borrows);

  return (
    <>
      <Header />
      <main className="g-main">
        <Sidebar />

        <section className="book-section">
          <h2 className="page-title">Popular</h2>

          <div className="book-grid">
            {sorted.map((book) => (
              <article key={book.id} className="book-card">
                <div style={{ position: "relative" }}>
                  <img
                    src={book.image}
                    alt={book.title}
                    className="book-cover"
                    loading="lazy"
                  />
                  <span
                    style={{
                      position: "absolute",
                      top: 8,
                      left: 8,
                      padding: "4px 8px",
                      fontSize: 12,
                      fontWeight: 700,
                      background: "#111827",
                      color: "#fff",
                      borderRadius: 999,
                    }}
                  >
                    Top
                  </span>
                </div>

                <h3 className="book-title">{book.title}</h3>
                <p className="book-author">Written by {book.author}</p>
                <p style={{ color: "#6b7280", fontSize: 13, marginTop: 4 }}>
                  {book.borrows.toLocaleString()} borrows
                </p>
              </article>
            ))}
          </div>
        </section>
      </main>
    </>
  );
}