describe('Keluar', () => {
  it('Admin can logout', () => {
      cy.visit('localhost:8000/masuk')
      cy.get('.mb-3 > .input-group > .form-control').type('admin@gmail.com')
      cy.get(':nth-child(3) > .input-group > .form-control').type('password')
      cy.get('.btn').click()

      cy.get('.navbar-nav > .nav-item > .nav-link > .media').click()
      cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/keluar"]').click()
  })
})
