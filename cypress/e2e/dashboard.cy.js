describe('Use Open Dashboard', () => {
    it('Dashboard can open Dashboard', () => {

        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')
  
    })
  
    it('Dashboard can grafik Cetak Surat Harian', () => {

       
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()

        cy.get('input[name=tanggal]').type('2022-12-14') 
    })
    
    it('User can Cetak grafik Surat Tahunan', () => {

       
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()

        cy.get('input[name=tahun]').type('2022') 
    })
  })
  