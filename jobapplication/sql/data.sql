CREATE TABLE JobApplications (
    ApplicationID INT AUTO_INCREMENT PRIMARY KEY, 
    ApplicantName VARCHAR(100) NOT NULL,         
    Email VARCHAR(100) NOT NULL,                 
    PhoneNumber VARCHAR(15) NOT NULL,            
    JobTitle VARCHAR(100) NOT NULL,              
    Status ENUM('Pending', 'Reviewed', 'Accepted', 'Rejected') DEFAULT 'Pending', 
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Insert 20 sample records into JobApplications
INSERT INTO JobApplications (ApplicantName, Email, PhoneNumber, JobTitle, Status)
VALUES
('John Doe', 'john.doe@example.com', '123-456-7890', 'Software Engineer', 'Pending'),
('Jane Smith', 'jane.smith@example.com', '234-567-8901', 'Data Analyst', 'Pending'),
('Alice Brown', 'alice.brown@example.com', '345-678-9012', 'Graphic Designer', 'Reviewed'),
('Bob Johnson', 'bob.johnson@example.com', '456-789-0123', 'Project Manager', 'Accepted'),
('Charlie Davis', 'charlie.davis@example.com', '567-890-1234', 'Content Writer', 'Rejected'),
('Eve White', 'eve.white@example.com', '678-901-2345', 'Marketing Specialist', 'Pending'),
('Frank Green', 'frank.green@example.com', '789-012-3456', 'Customer Support', 'Reviewed'),
('Grace Hall', 'grace.hall@example.com', '890-123-4567', 'HR Manager', 'Accepted'),
('Hank Miller', 'hank.miller@example.com', '901-234-5678', 'Network Engineer', 'Rejected'),
('Ivy Young', 'ivy.young@example.com', '012-345-6789', 'Cybersecurity Analyst', 'Pending'),
('Jack Taylor', 'jack.taylor@example.com', '123-456-7891', 'Product Manager', 'Pending'),
('Kathy Adams', 'kathy.adams@example.com', '234-567-8902', 'Mobile App Developer', 'Reviewed'),
('Leo Carter', 'leo.carter@example.com', '345-678-9013', 'SEO Specialist', 'Accepted'),
('Mia Evans', 'mia.evans@example.com', '456-789-0124', 'UI/UX Designer', 'Rejected'),
('Noah Walker', 'noah.walker@example.com', '567-890-1235', 'Web Developer', 'Pending'),
('Olivia Harris', 'olivia.harris@example.com', '678-901-2346', 'Business Analyst', 'Reviewed'),
('Paul Scott', 'paul.scott@example.com', '789-012-3457', 'DevOps Engineer', 'Accepted'),
('Quinn Lewis', 'quinn.lewis@example.com', '890-123-4568', 'Database Administrator', 'Rejected'),
('Ruby King', 'ruby.king@example.com', '901-234-5679', 'Cloud Engineer', 'Pending'),
('Steve Moore', 'steve.moore@example.com', '012-345-6780', 'AI Researcher', 'Pending');
