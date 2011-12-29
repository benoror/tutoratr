class Rating < ActiveRecord::Base
	belongs_to :tutor
	belongs_to :course
	
	validates_presence_of :comment, :tutor_id, :course_id
	validate :rating_between_0_and_100

        def to_param
          "#{id}_#{tutor.name.parameterize}_#{course.name.parameterize}"
        end

protected
	def rating_between_0_and_100
		errors.add(:rating, 'should be between 0 and 100') if rating.nil? or not rating.between?(0, 100)
	end
	
        def self.paginate_ratings(page)
                paginate :per_page => 10, :page => page,
                         :order => 'updated_at DESC'
        end

end
