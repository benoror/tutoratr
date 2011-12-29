# Be sure to restart your server when you modify this file.

# Your secret key for verifying cookie session data integrity.
# If you change this key, all old sessions will become invalid!
# Make sure the secret is at least 30 characters and all random, 
# no regular words or you'll be exposed to dictionary attacks.
ActionController::Base.session = {
  :key         => '_tutoratr_session',
  :secret      => '0d23d6b414983cbd2a73ea67a94da202c9db894a238b12d14c18d6f430ce4b6cd5fb3601dbad7ad0aae9a59c78e24f8aa25030ebdc4d0bcdda97026648083cd3'
}

# Use the database for sessions instead of the cookie-based default,
# which shouldn't be used to store highly confidential information
# (create the session table with "rake db:sessions:create")
# ActionController::Base.session_store = :active_record_store
