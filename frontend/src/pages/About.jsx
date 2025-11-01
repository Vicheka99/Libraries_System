export default function About() {
  return (
    <main className="g-main g-main--single">
      {/* HERO */}
      <section
        className="about-hero"
        style={{ "--hero-image": "url(/images/Image/cover/cover1.jpg)" }}
      >
        <div className="about-hero__content">
          <h1 className="about-title">About Us</h1>
          <p className="about-subtitle">
            From preschool to pre-tertiary, our students enjoy fun, interactive
            and relevant lessons and are empowered to think beyond the confines
            of the classroom.
          </p>
          <a href="#about-more" className="btn btn--light">
            See More
          </a>
        </div>
      </section>

      {/* INFO GRID */}
      <section id="about-more" className="about-panel">
        <div className="about-grid">
          <div className="about-card">
            <h3>Our Mission</h3>
            <p>
              Inspire a lifelong love of reading by providing inclusive access
              to books, technology, and supportive learning spaces.
            </p>
          </div>
          <div className="about-card">
            <h3>What We Do</h3>
            <p>
              We curate collections, run clubs and workshops, and partner with
              schools to make research and literacy engaging for everyone.
            </p>
          </div>
          <div className="about-card">
            <h3>Our Values</h3>
            <p>
              Accessibility, curiosity, and community. We believe knowledge
              should be welcoming, discoverable, and fun.
            </p>
          </div>
        </div>
      </section>

      {/* MEMBER SECTION */}
      <section className="about-members">
        <h2 className="member-title">
          Member
          <span className="member-highlight"></span>
        </h2>

        <div className="member-grid">
          <div className="member-col">
            <h3>Ux/UI & Design</h3>
            <p>Sok Chomroeun</p>
            <p>Oum Chansopheap</p>
            <p>Un Rithy Reach</p>
          </div>
          <div className="member-col">
            <h3>Data Analysis</h3>
            <p>Seung Wannet</p>
            <p>Sum Virakroth</p>
          </div>
          <div className="member-col">
            <h3>Frontend</h3>
            <p>Sien KimYong</p>
            <p>Sophy David</p>
            <p>Vath Bundavit</p>
          </div>
          <div className="member-col">
            <h3>Backend & Deploy</h3>
            <p>Leng Lyhour</p>
            <p>SuLi</p>
            <p>Suy Koemhong</p>
          </div>
        </div>
      </section>
    </main>
  );
}