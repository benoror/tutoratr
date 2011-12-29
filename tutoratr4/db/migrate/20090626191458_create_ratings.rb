class CreateRatings < ActiveRecord::Migration
  def self.up
    create_table :ratings do |t|
      t.integer :tutor_id
      t.integer :course_id
      t.integer :rating
      t.text :comment
      t.string :sender
      t.string :ip
      t.string :fb_user

      t.timestamps
    end
  end

  def self.down
    drop_table :ratings
  end
end
