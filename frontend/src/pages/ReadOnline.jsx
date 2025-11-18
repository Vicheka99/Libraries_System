import { useParams, useLocation, Link } from "react-router-dom";

export default function ReadOnline() {
  const { id } = useParams();
  const { state } = useLocation();
  const book = state?.book;

  if (!book || !book.file_path) {
    return (
      <main className="container" style={{ padding: '2rem' }}>
        <h1>File not available</h1>
        <p>The book file could not be found.</p>
        <Link to="/" className="btn btn--primary">← Back Home</Link>
      </main>
    );
  }

  return (
    <main style={{ width: '100%', height: '100vh', margin: 0, padding: 0 }}>
      <div style={{ 
        backgroundColor: '#333', 
        color: 'white', 
        padding: '1rem', 
        display: 'flex', 
        justifyContent: 'space-between',
        alignItems: 'center'
      }}>
        <h2 style={{ margin: 0, fontSize: '1.2rem' }}>{book.title}</h2>
        <Link 
          to={`/books/${id}`} 
          state={{ book }}x
          style={{ 
            color: 'white', 
            textDecoration: 'none',
            padding: '0.5rem 1rem',
            backgroundColor: '#555',
            borderRadius: '4px'
          }}
        >
          ✕ Close
        </Link>
      </div>
      <iframe
        src={`${book.file_path}#toolbar=1&navpanes=0&scrollbar=1`}
        title={book.title}
        style={{
          width: '100%',
          height: 'calc(100vh - 60px)',
          border: 'none'
        }}
      />
    </main>
  );
}
